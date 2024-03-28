<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersMaster;
use App\Models\Category;
use App\Models\Theme;
use App\Models\Quote;
use App\Models\Favourite;
use Validator;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'social_id' => 'required',
                'login_type' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = UsersMaster::where(['social_id' => $request->social_id, 'login_type' => $request->login_type])->first();
            if ($user) {
                return $this->sendResponse($user, 'Login successfully.');
            } else {

                $validator = Validator::make($request->all(), [
                    'social_id' => 'required',
                    'login_type' => 'required',
                    'device_type' => 'required',
                    'username' => 'required_if:email,null',
                    'email' => 'required_if:username,null|email',
                ]);
                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $input = $request->all();
                $user = UsersMaster::create($input);
                return $this->sendResponse($user, 'sign up successfully.');
            }
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = UsersMaster::where(['id' => $request->user_id])->first();
            if (!$user) {
                return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            } else {
                return $this->sendSuccess('Logout successfully.');
            }
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = UsersMaster::where(['id' => $request->user_id])->first();
            if (!$user) {
                return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            } else {
                UsersMaster::where(['id' => $request->user_id])->delete();
                return $this->sendSuccess('Account delete successfully.');
            }
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function getCategory(Request $request)
    {
        try {
            $categories = Category::orderBy('id', 'desc')->get();
            return $this->sendResponse($categories, 'Get categories successfully.');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function getThemes(Request $request)
    {
        try {
            $Themes = Theme::orderBy('id', 'desc')->get();
            return $this->sendResponse($Themes, 'Get themes successfully.');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }


    public function getQuotes(Request $request)
    {
        try {
            if ($request->category_id) {
                $quote = quote::where('category_id', $request->category_id)->orderBy('id', 'desc')->get();
            } else {
                $quote = quote::orderBy('id', 'desc')->get();
            }
            return $this->sendResponse($quote, 'Get quotes successfully.');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function favouriteQuote(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'quote_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = UsersMaster::where(['id' => $request->user_id])->first();
            if (!$user) {
                return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            } else {

                $favourite = Favourite::where(['user_id' => $request->user_id, 'quote_id' => $request->quote_id])->first();
                if (!$favourite) {
                    $input = $request->all();
                    $user = Favourite::create($input);
                    return $this->sendSuccess('Favourite quote successfully.');
                } else {
                    $input = $request->all();
                    $user = Favourite::where('id', $favourite->id)->delete();
                    return $this->sendSuccess('Unfavourite quote successfully.');
                }
            }
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function getFavouriteQuote(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = UsersMaster::where(['id' => $request->user_id])->first();
            if (!$user) {
                return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            } else {
                $favourite = Favourite::with('quote')->where(['user_id' => $request->user_id])->orderBy('id','desc')->get();
                return $this->sendResponse($favourite, 'Get favourite quotes successfully.');
            }
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
