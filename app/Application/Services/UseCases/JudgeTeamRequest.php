<?php

namespace App\Application\Services\UseCases;

use App\Application\Services\UseCases\Support\BulkUseCaseInterface;
use App\Models\RequestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Notifications\SlackPosted;
use Dingo\Api\Exception\ResourceException;

class JudgeTeamRequest implements BulkUseCaseInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $histories = [];

    /**
     * @var RequestHistory
     */
    private $requestHistory;

    public function __construct(Request $request, RequestHistory $requestHistory)
    {
        $this->request        = $request;
        $this->requestHistory = $requestHistory;
    }

    /**
     * @return array
     */
    public function executeBulk(): array
    {
        DB::beginTransaction();

        try {
            DB::table('team_requests')->whereIn('id', $this->request->teamRequest->pluck('id'))->delete();

            foreach ($this->request->get('data') as $updateData) {
                $filtered = $this->request->teamRequest->where('id', $updateData['request_id']);
                if ($filtered->count() !== 0) {
                    $this->setHistory($filtered, $updateData['result']);
                }
            }

            DB::table('request_histories')->insert($this->histories);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $attachment = $this->requestHistory->createAttachmentOfQueryException($e);
            $this->requestHistory->notify(new SlackPosted(true, $attachment));
            throw new ResourceException('Resource operate was failed', ['isSuccess' => false]);
        }

        return array_only($this->request->all(), ['team_id']);
    }

    /**
     * @param Collection $teamRequest
     * @param string     $result
     */
    private function setHistory(Collection $teamRequest, string $result)
    {
        $data = [
            'user_id' => $teamRequest->pluck('user_id')->shift(),
            'team_id' => $teamRequest->pluck('team_id')->shift(),
            'result'  => $result,
        ];

        $this->histories[] = $data;
    }
}
