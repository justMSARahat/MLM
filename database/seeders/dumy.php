<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use hash;


class dumy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('webinfos')->insert([
            'title'             => 'MSA Rahat',
            'description'       => 'Outstock is a premium Templates theme',
            'currency'          => 'BDT',
            'currency_icon'     => '$',
            'favicon'           => 'logo.png',
            'logo'              => 'logo.png',
            'join_bonus'        => 0,
            'reffer_bonus'      => 0,
        ]);
        DB::table('contactinfos')->insert([
            'address'           => '1234 Heaven Stress, Beverly Hill, Melbourne, USA.',
            'email'             => 'Contact@erentheme.com',
            'phone'         => '(800) 123 456 789',
            'description'       => 'Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
            'facebook'          => 'https://www.facebook.com/',
            'twitter'           => 'https://www.twitter.com/',
            'linkedin'          => 'https://www.linkedin.com/',
            'map_api'           => 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14478.041320327731!2d91.88062475!3d24.8805685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1622477092380!5m2!1sen!2sbd',
            'schedule1'         => '9am to 5pm',
            'schedule2'         => '9am to 5pm',
            'schedule3'         => '9am to 5pm',
        ]);
        DB::table('footers')->insert([
            'logo'                  => 'default.jpg',
            'site_title'            => 'Lorem ipsum dolor sit amet.',
            'description'           => 'Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
            'email'                 => 'Contact@erentheme.com',
            'address'               => '1234 Heaven Stress, Beverly Hill, Melbourne, USA.',
            'phone'                 => '(800) 123 456 789',
            'copywrite'             => 'CopyWrite Belongs To MSA Inddustry',
            'facebook'              => 'https://www.facebook.com/',
            'twitter'               => 'https://www.twitter.com/',
            'linkedin'              => 'https://www.linkedin.com/',
        ]);
        DB::table('pageheaders')->insert([
            [
                'title'             => 'About',
                'breadcrumbs'       => 'About',
                'page'              => 'About',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'About',
                'meta_title'        => 'About',
                'description'       => 'About',
                'tag'               => 'About',
            ],
            [
                'title'             => 'Account',
                'breadcrumbs'       => 'Account',
                'page'              => 'Account',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Account',
                'meta_title'        => 'Account',
                'description'       => 'Account',
                'tag'               => 'Account',
            ],
            [
                'title'             => 'Contact',
                'breadcrumbs'       => 'Contact',
                'page'              => 'Contact',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Contact',
                'meta_title'        => 'Contact',
                'description'       => 'Contact',
                'tag'               => 'Contact',
            ],
            [
                'title'             => 'Faq',
                'breadcrumbs'       => 'Faq',
                'page'              => 'Faq',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Faq',
                'meta_title'        => 'Faq',
                'description'       => 'Faq',
                'tag'               => 'Faq',
            ],
            [
                'title'             => 'Record',
                'breadcrumbs'       => 'Record',
                'page'              => 'Record',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Record',
                'meta_title'        => 'Record',
                'description'       => 'Record',
                'tag'               => 'Record',
            ],
            [
                'title'             => 'Video',
                'breadcrumbs'       => 'Video',
                'page'              => 'Video',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Video',
                'meta_title'        => 'Video',
                'description'       => 'Video',
                'tag'               => 'Video',
            ],
            [
                'title'             => 'Login',
                'breadcrumbs'       => 'Login',
                'page'              => 'Login',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Login',
                'meta_title'        => 'Login',
                'description'       => 'Login',
                'tag'               => 'Login',
            ],
            [
                'title'             => 'Register',
                'breadcrumbs'       => 'Register',
                'page'              => 'Register',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Register',
                'meta_title'        => 'Register',
                'description'       => 'Register',
                'tag'               => 'Register',
            ],
            [
                'title'             => 'Password Reset',
                'breadcrumbs'       => 'Password Reset',
                'page'              => 'Reset',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Password Reset',
                'meta_title'        => 'Password Reset',
                'description'       => 'Password Reset',
                'tag'               => 'Password Reset',
            ],
            [
                'title'             => '404',
                'breadcrumbs'       => '404',
                'page'              => '404',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => '404',
                'meta_title'        => '404',
                'description'       => '404',
                'tag'               => '404',
            ],
            [
                'title'             => 'Home',
                'breadcrumbs'       => 'Home',
                'page'              => 'Home',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Home',
                'meta_title'        => 'Home',
                'description'       => 'Home',
                'tag'               => 'Home',
            ],
        ]);
        DB::table('users')->insert([
            'name' => 'MSA Rahat',
            'email' => 'justshamsulalom@gmail.com',
            'password' => bcrypt('justshamsulalom'),
        ]);
        $faker  = Faker::create();
        foreach( range(1,20) as $index ){
            DB::table('customers')->insert([
                'name'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'password'      => encrypt('password'),
                'ref_id'        => Str::random(20),
                'reffer'        => Str::random(20),
                'amount'        => 200,
                'invoice'       => Str::random(20),
                'status'        => 1,
                'activity'      => Null,
                'image'         => 'default.jpg',
                'created_at'    => $faker->dateTimeBetween('-6 month','+6 month'),
            ]);
        }
        DB::table('abouts')->insert([
            'title' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque dolorum similique vel?',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur eos sequi minus quis amet necessitatibus! Aut distinctio blanditiis molestias, quibusdam necessitatibus voluptatibus? Deserunt aliquam reiciendis, aspernatur rerum amet fuga? Distinctio labore cupiditate beatae recusandae aspernatur similique libero quos adipisci laudantium amet saepe optio eligendi accusantium dolores rerum expedita, quibusdam illo pariatur facilis? Quod, pariatur voluptatem? Facilis, voluptatum consequatur, ab fuga quo illo commodi temporibus iste voluptates, magnam vel eum inventore eligendi vero obcaecati sapiente nulla explicabo! A, pariatur dicta sequi maxime, quas assumenda nisi eum odio sed blanditiis molestiae eveniet quod quos voluptatibus enim magni, laborum animi ullam? Eveniet, repellat.',
        ]);

    }
}
