<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Helpers\Helper;

class Profile extends Component
{
    use WithFileUploads;

    public User $user;
    
    # Profil Pribadi
    public $image;
    public $name;
    public $phone;
    public $gender;
    public $birthday;
    public $address;
    public $village;
    public $district;
    public $city;
    public $country;
    public $bio;
    
    # Sosial Media
    public $website;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $pinterest;
    public $dribbble;
    public $youtube;

    public function mount()
    {
        $this->user = me();
        
        # Profil Pribadi
        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
        $this->gender = $this->user->gender;
        $this->birthday = $this->user->birthday;
        $this->address = $this->user->address;
        $this->village = $this->user->village;
        $this->district = $this->user->district;
        $this->city = $this->user->city;
        $this->country = $this->user->country;
        $this->bio = $this->user->bio;
        
        # Sosial Media
        $this->website = $this->user->website;
        $this->facebook = $this->user->facebook;
        $this->twitter = $this->user->twitter;
        $this->instagram = $this->user->instagram;
        $this->linkedin = $this->user->linkedin;
        $this->pinterest = $this->user->pinterest;
        $this->dribbble = $this->user->dribbble;
        $this->youtube = $this->user->youtube;
    }

    public function updateProfile()
    {
        $this->validate([
            'name'      => ['required', 'nullable', 'max:30'],
            'bio'       => ['required', 'nullable', 'max:160']
        ]);

        $this->user->name = $this->name;
        $this->user->bio = $this->bio;
        $this->user->phone = $this->phone;
        $this->user->gender = $this->gender;
        $this->user->birthday = $this->birthday;
        $this->user->address = $this->address;
        $this->user->village = $this->village;
        $this->user->district = $this->district;
        $this->user->city = $this->city;
        $this->user->country = $this->country;

        $this->user->save();

        $this->emit('profileUpdated');
        logify(request(), 'User', me(), 'Updated the profile settings');
        return toast($this, 'success', 'Your profile has been updated!');
    }

    public function updatePhoto()
    {
        $this->validate([
            'image'     => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ]);

        if($this->image):
            
            Helper::deleteCDNImage($this->user->image); 

            $img = Image::make($this->image)->fit(400)->encode('webp', 100);
            $imageName = Str::orderedUuid().'.webp';
            Storage::disk('s3')->put('imagekit/avatars/'.$imageName, $img->__toString(), 'public');
            $this->user->image = Storage::disk('s3')->url('imagekit/avatars/'.$imageName);
        endif;

        $this->user->save();

        $this->emit('avatarUpdated');
        logify(request(), 'User', me(), 'Updated the avatar');

        return toast($this, 'success', 'Your avatar has been updated!');
    }

    public function resetAvatar()
    {
        Helper::deleteCDNImage($this->user->image); 

        $this->user->image = 'https://avatar.tobi.sh/'.Str::orderedUuid().'.svg?text='.strtoupper(substr($this->user->username, 0, 2));
        $this->user->save();
        
        $this->emit('avatarResetted');
        logify(request(), 'User', me(), 'Updated avatar provider to Initial');
        return toast($this, 'success', 'Your avatar has been resetted!');
    }

    public function useGravatar()
    {
        Helper::deleteCDNImage($this->user->image); 

        $this->user->image = 'https://secure.gravatar.com/avatar/'.md5(me()->email).'?s=500&d=identicon';
        $this->user->save();

        $this->emit('gravatarUsed');
        logify(request(), 'User', me(), 'Updated avatar provider to Gravatar');
        
        toast($this, 'success', 'Your avatar has been switched to Gravatar!');
    }

    public function updateSocial()
    {
        $this->validate([
            'website'   => ['nullable', 'active_url'],
            'facebook'  => ['nullable', 'alpha_dash', 'max:200'],
            'twitter'   => ['nullable', 'alpha_dash', 'max:30'],
            'instagram' => ['nullable', 'alpha_dash', 'max:200'],
            'linkedin'  => ['nullable', 'alpha_dash', 'max:30'],
            'pinterest' => ['nullable', 'alpha_dash', 'max:30'],
            'dribbble'  => ['nullable', 'alpha_dash', 'max:30'],
            'youtube'   => ['nullable', 'alpha_dash', 'max:30'],
        ]);

        $this->user->website = $this->website;
        $this->user->facebook = $this->facebook;
        $this->user->twitter = $this->twitter;
        $this->user->instagram = $this->instagram;
        $this->user->linkedin = $this->linkedin;
        $this->user->pinterest = $this->pinterest;
        $this->user->dribbble = $this->dribbble;
        $this->user->youtube = $this->youtube;
        $this->user->save();

        $this->emit('socialUpdated');
        logify(request(), 'User', me(), 'Updated the social URLs');
        return toast($this, 'success', 'Your social links has been updated!');
    }
}
