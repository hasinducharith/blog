<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder{

    public function run(){

        $posts = array(
            0 =>
                array(
                    'title' => 'GM has started shipping replacement battery modules for recalled Chevy Bolt EVs',
                    'slug' => 'gm-has-started-shipping-replacement-battery-modules-for-recalled-chevy-bolt-evs',
                    'user_id' => 1,
                    'category_id' => 1,
                     'photo' => 'default.jpg',
                    'description' => 'Before renaming a table, you should verify that any foreign key constraints on the table have an explicit name in your migration files instead of letting Laravel assign a convention based name. Otherwise, the foreign key constraint name will refer to the old table name.'
            ),
            1 =>
            array(
                'title' => 'South Africa’s Telkom ditches Netflix',
                'slug' => 'south-africas-telkom-ditches-netflix',
                'user_id' => 1,
                'category_id' => 1,
                 'photo' => 'default.jpg',
                'description' => 'South Africa’s telecommunication provider Telkom SA SOC Ltd has since October discontinued Netflix Inc. from its phone and internet set-top box, said a Bloomberg report. Telkom’s Content Exec'
            ),
            2 =>
            array(
                'title' => 'Google pulls stalkerware ads that promoted phone spying apps Zack Whittaker',
                'slug' => 'google-pulls-stalkerware-ads-that-promoted-phone-spying-apps-zack-whittaker',
                'user_id' => 1,
                'category_id' => 1,
                 'photo' => 'default.jpg',
                'description' => 'Google has pulled several “stalkerware” ads that violated its policies by promoting apps that encouraged prospective users to spy on their spouses’ phone. These consumer-grade spy.'
            ),
            3 =>
            array(
                'title' => 'Why investors can’t get enough of fintech companies like Mambu',
                'slug' => 'why-investors-cant-get-enough-of-fintech-companies-like-mambu',
                'user_id' => 1,
                'category_id' => 1,
                 'photo' => 'default.jpg',
                'description' => 'A record $30.8 billion of venture capital was invested across 657 fintech deals globally in Q2 of 2021 alone - shattering the previous quarter’s record by almost a third. Read about what sparked the latest boom'
            ),
            4 =>
            array(
                'title' => 'To continue exploring space sustainably, we must act now',
                'slug' => 'to-continue-exploring-space-sustainably-we-must-act-now',
                'user_id' => 1,
                'category_id' => 1,
                 'photo' => 'default.jpg',
                'description' => 'We’re at the start of a gold rush in outer space — and our track record for the sustainable development of any environment during gold rushes hasn’t been particularly noteworthy.'
            ),
            5 =>
            array(
                'title' => 'Facebook’s Oversight Board will meet with the Facebook whistleblower',
                'slug' => 'facebooks-oversight-board-will-meet-with-the-facebook-whistleblower',
                'user_id' => 1,
                'category_id' => 1,
                 'photo' => 'default.jpg',
                'description' => 'Facebook’s external policy review board will meet with Frances Haugen, a former Facebook employee who went public with her concerns about the company last week. Facebook’s Oversight Boa.'
            ),
        );
        
        foreach ($posts as $post) {
            Post::create($post);
        }

    }
}