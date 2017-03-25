<?php

namespace App\Application\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use Dingo\Api\Routing\Helpers;

class AuthController extends Controller
{
    use Helpers;

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function storeFbUserData(Request $request)
    {
        //念のため必須バリデーションくらい記述
        $this->validate($request, [
            'fb_name' => 'required',
            'fb_id'   => 'required',
        ]);

        /**
         * fb_idに紐づくuserが既に存在している場合
         * 保存処理は行わない(再ログインの場合など).
         */
        $storedUser = User::where('fb_id', $request->get('fb_id'))->first();

        if ($storedUser !== null) {
            //JWT Tokenを返却
            $token = JWTAuth::fromUser($storedUser);

            return response()->json(compact('token'));
        }

        if (!$storedUser) {

            /**
             * @Todo Validation: facebookに登録されているユーザかどうかをGraphApiで判定するほうがいい？
             */

            /**
             * 新規ユーザーを保存.
             */
            $user = new User($request->all());

            if (!$user->save()) {
                /*
                 * @Todo ログ保存を後に実装(Mongoかファイルベースか)
                 */
                return response()->json(['error' => 'user save error'], 500);
            }

            //JWT Tokenを返却
            $token = JWTAuth::fromUser($user);

            return response()->json(compact('token'));
        }
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to re-login to get a new token.
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
        ]);
        JWTAuth::invalidate($request->input('token'));
    }
}
