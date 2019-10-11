<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Group::class, 3)->create();

        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);

        factory(App\User::class, 5)->create()->each(function ($user) {

            $profile = $user->profile()->save(factory(App\Profile::class)->make());

            $profile->location()->save(factory(App\Location::class)->make());

            $user->groups()->attach($this->array(rand(1,3)));

            $user->image()->save(factory(App\Image::class)->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));

        });

        factory(App\Category::class, 4)->create();
        factory(App\Tag::class, 12)->create();

        factory(App\Post::class, 40)->create()->each(function ($post) {

            $post->image()->save(factory(App\Image::class)->make());
            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i=0; $i < $number_comments; $i++) { 
                $post->comments()->save(factory(App\Comment::class)->make());
            }

        });

        factory(App\Video::class, 40)->create()->each(function ($video) {

            $video->image()->save(factory(App\Image::class)->make());
            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i=0; $i < $number_comments; $i++) { 
                $video->comments()->save(factory(App\Comment::class)->make());
            }

        });
    }

    public function array($max)
    {
        $values = [];

        for ($i=1; $i < $max; $i++) { 
            $values[] = $i;
        }

        return $values;
    }

}






