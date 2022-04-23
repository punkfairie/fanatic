<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
			['name' => 'Academia'],
			['name' => 'Actors'],
			['name' => 'Actresses'],
			['name' => 'Adult'],
			['name' => 'Advertising/TV Channels'],
			['name' => 'Albums'],
			['name' => 'Animals'],
			['name' => 'Animation'],
			['name' => 'Anime/Manga'],
			['name' => 'Arts and Design'],
			['name' => 'Authors/Writers'],
			['name' => 'Calendar Events'],
			['name' => 'Characters: Book/Movie'],
			['name' => 'Characters: TV'],
			['name' => 'Comics'],
			['name' => 'Companies'],
			['name' => 'Computer Miscellany and Internet'],
			['name' => 'Directors/Producers'],
			['name' => 'Episodes'],
			['name' => 'Fan Works'],
			['name' => 'Fashion/Beauty'],
			['name' => 'Food/Drinks'],
			['name' => 'Games'],
			['name' => 'History/Royalty'],
			['name' => 'Hobbies and Recreation'],
			['name' => 'Literature'],
			['name' => 'Miscellaneous'],
			['name' => 'Models'],
			['name' => 'Movies'],
			['name' => 'Music Miscellany'],
			['name' => 'Musicians: Bands/Groups'],
			['name' => 'Musicians: Female'],
			['name' => 'Musicians: Male'],
			['name' => 'Mythology/Religion'],
			['name' => 'Nature'],
			['name' => 'Objects'],
			['name' => 'People Miscellany'],
			['name' => 'Personalities'],
			['name' => 'Places'],
			['name' => 'Politics and Organisations'],
			['name' => 'Relationships: Book/Movie'],
			['name' => 'Relationships: Real Life'],
			['name' => 'Relationships: TV'],
			['name' => 'Songs: Bands/Groups 0-M'],
			['name' => 'Songs: Bands/Groups N-Z'],
			['name' => 'Songs: Female Solo'],
			['name' => 'Songs: Male Solo'],
			['name' => 'Songs: Various'],
			['name' => 'Sports'],
			['name' => 'Sports Entertainment'],
			['name' => 'Stage/Theatre'],
			['name' => 'Toys/Collectibles'],
			['name' => 'Transportation'],
			['name' => 'TV Shows'],
			['name' => 'TV/Movie/Book Miscellany'],
			['name' => 'Webmasters'],
			['name' => 'Websites'],
		]);
    }
}
