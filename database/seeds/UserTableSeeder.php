<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\ProfessionalInformation as ProfessionalInformationEntity;
use App\Services\File\Images as ImagesService;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = new ImagesService;
        $sections = config('occ_pros.settings.users.profile_pic.sections');
        $availableImages = [];

        foreach(range(1,4) as $i){
            $availableImages[] = 'talent'.$i.'.jpg';
        }

        factory(User::class,20)->create()->each(function($user) use($images, $sections, $availableImages)
        {
            $sentinel_user = Sentinel::findById($user->id);

            $activation = Activation::create($sentinel_user);
            $activation->completed = 1;
            $activation->save();

            $profile_information_fake_data = factory(ProfessionalInformationEntity::class)->make([
                'first_name' => $sentinel_user->first_name,
                'last_name'  => $sentinel_user->last_name
            ]);

            $imageName = $availableImages[rand(0,3)];
            $dirPath = 'public/uploads/users/'.$user->id.'/';
            $dirPathToCopy = 'public/uploads/users/'.$user->id.'/'.$imageName;
            $imageToCopy = 'public/seeder/'.$imageName;
            $imagePath = Storage::copy($imageToCopy,$dirPathToCopy);
            $images->generateSizes(
                storage_path('app/'.$dirPath),
                storage_path('app/'.$imageToCopy),
                $sections
            );

            $user->profileInformation()->save($profile_information_fake_data);

            $user_role = Sentinel::findRoleByName('Users');
            $user_role->users()->attach($sentinel_user);
        });
    }
}
