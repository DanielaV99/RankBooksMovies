<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Item;
use App\Models\User;
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
        $demoUser = User::factory()->demoUser()->create();
        $demoAdmin = User::factory()->demoAdmin()->create();
        $sfGenre = Genre::create(['name' => 'SF']);
        $comedyGenre = Genre::create(['name' => 'comedy']);
        $fpsGenre = Genre::create(['name' => 'FPS']);
        $movieCategory = Category::create(['name' => 'movie']);
        $bookCategory = Category::create(['name' => 'book']);

        Item::create([
            'title' => 'Star Wars',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $sfGenre->id,
        ]);
        Item::create([
            'title' => 'Scary Movie',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        Item::create([
            'title' => 'fps',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $fpsGenre->id,
        ]);
        Item::create([
            'title' => 'My secret agent',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $movieCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        Item::create([
            'title' => 'My comedy book',
            'isApproved' => true,
            'user_id' => $demoUser->id,
            'category_id' => $bookCategory->id,
            'genre_id' => $comedyGenre->id,
        ]);
        Item::create([
            'title' => 'Battle in the stars',
            'isApproved' => true,
            'user_id' => $demoAdmin->id,
            'category_id' => $bookCategory->id,
            'genre_id' => $sfGenre->id,
        ]);

    }
}
