<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $demoUser = User::factory()->demoUser()->create();
        $demoAdmin = User::factory()->demoAdmin()->create();
        $sfGenre = Genre::create(['name' => 'SF']);
        $comedyGenre = Genre::create(['name' => 'comedy']);
        $fpsGenre = Genre::create(['name' => 'FPS']);
        $movieCategory = Category::create(['name' => 'movie']);
        $bookCategory = Category::create(['name' => 'book']);

        $starWars = Item::create([
            'title' => 'Star Wars',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $sfGenre->id,
        ]);
        $scaryMovie = Item::create([
            'title' => 'Scary Movie',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        $fps = Item::create([
            'title' => 'fps',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $fpsGenre->id,
        ]);
        $mySecretAgent = Item::create([
            'title' => 'My secret agent',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        $myComedyBook = Item::create([
            'title' => 'My comedy book',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $bookCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        $battleInTheStars = Item::create([
            'title' => 'Battle in the stars',
            'isApproved' => true,
            'user_id' => $demoAdmin->id,
            'category_id' => $bookCategory->id,
            'genre_id' => $sfGenre->id,
        ]);

        DB::table('user_reviews')->insert([
            [
                'id' => 1,
                'user_id' => $demoUser->id,
                'item_id' => $starWars->id,
                'rank' => 1,
                'comment' => 'boring',
            ],
            [
                'id' => 2,
                'user_id' => $demoAdmin->id,
                'item_id' => $scaryMovie->id,
                'rank' => 5,
                'comment' => 'good',
            ],
            [
                'id' => 3,
                'user_id' => $demoUser->id,
                'item_id' => $scaryMovie->id,
                'rank' => 3,
                'comment' => 'average',
            ],
            [
                'id' => 4,
                'user_id' => $demoUser->id,
                'item_id' => $fps->id,
                'rank' => 10,
                'comment' => 'brilliant',
            ],
        ]);

    }
}
