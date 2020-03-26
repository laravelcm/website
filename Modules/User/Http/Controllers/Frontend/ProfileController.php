<?php

namespace Modules\User\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KeyValue;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\Frontend\UpdateInformationRequest;
use Modules\User\Http\Requests\Frontend\UpdateProfileRequest;
use Modules\User\Repositories\Frontend\UserRepository;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * ProfileController constructor.
     *
     * @param  UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  UpdateInformationRequest $request
     *
     * @return mixed
     * @throws \Modules\Core\Exceptions\GeneralException
     */
    public function update(UpdateInformationRequest $request)
    {
        $output = $this->userRepository->update(
            $request->user()->id,
            $request->only('first_name', 'last_name', 'email', 'avatar_type', 'avatar_location'),
            $request->has('avatar_location') ? $request->file('avatar_location') : false
        );

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')
                ->withFlashInfo(__('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }

    /**
     * Mise a jour de la section profil de l'utilisateur.
     *
     * @param  UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(UpdateProfileRequest $request)
    {
        $result = $this->userRepository->updateProfile(
            $request->user()->id,
            $request->only('username')
        );

        if ($result) {
            $user = $this->userRepository->getById(auth()->id());

            if(!is_null($user->GetKeyValue('biography'))){
                KeyValue::where('keyvalue_id', '=', $user->id)
                    ->where('keyvalue_type', '=', User::class)
                    ->where('key', '=', 'biography')
                    ->update(['value' => $request->input('biography')]);
            } else {
                KeyValue::create([
                    'keyvalue_id' => $user->id,
                    'keyvalue_type' => User::class,
                    'key' => 'biography',
                    'value' => $request->input('biography')
                ]);
            }

            return back()
                ->with('type', 'profile')
                ->with('success', 'Informations ont été mise a jour avec succès.');
        }

        return back()
            ->with('type', 'profile')
            ->with('error', 'Impossible de mettre à jour votre profil.');
    }
}
