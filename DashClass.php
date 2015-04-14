<?php

use \Carbon\Carbon;

class UserController extends BaseController {

	public function postUpdate($id) {
		$updateUser = User::find($id);
		$updateUser->first_name = Input::get('first_name');
		$updateUser->last_name = Input::get('last_name');
		if ($updateUser->save()) {

			if (Input::hasFile('profile_pic')) {
				$filename = md5(Carbon::now());
				$img = Image::make($_FILES['profile_pic']['tmp_name']);
				$img->fit(200, 200);
				$img->save($filename . '.jpg');

				User::where('id', $id)->update(
					array('profile_pic' => $filename . '.jpg'));
			}

			return Redirect::back()
				->with('message', 'Profil anda telah dikemaskini');
		}

		return Redirect::back()
			->withErrors($updateUser->errors());
	}
}
