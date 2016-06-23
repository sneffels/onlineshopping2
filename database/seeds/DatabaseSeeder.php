<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'daynor',
                'email'=>'daynor@mail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=>'brayan',
                'email'=>'brayan@mail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=>'carlos',
                'email'=>'carlos@mail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=>'wendy',
                'email'=>'wendy@mail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=>'usuariotest',
                'email'=>'usuariotest@mail.com',
                'password'=>bcrypt('123456'),
                'role'=>'normal'
            ]
        ]);
        DB::table('products')->insert([
           [
               'name'=>'ThinkPad X1 Carbon',
               'description'=>'Ultrathin. Ultralight. Ultratough. For the average Ultrabook™ these attributes may sound like a contradiction. But the new X1 Carbon is far above average. It features a carbon-fiber reinforced chassis and passes durability tests in extreme environments. Plus, it delivers more than all-day battery life, includes faster, more powerful storage performance, and has innovative docking options available, including wireless.',
               'price'=>'1142.10',
               'image_path'=>'lenovo-x1-carbon-feature-3.png'
           ],
            [
                'name'=>'ThinkPad X260',
                'description'=>'Ultrathin and ultralight, the X260 is also ultratough- passing Military-specification testing for durability and reliability. It also features all-day battery life and is optimized for collaboration with enterprise-level security and manageability.',
                'price'=>'764.10',
                'image_path'=>'lenovo-laptop-thinkpad-x260-front-side-2.jpg'
            ],
            [
                'name'=>'Lenovo Flex 4 (14")',
                'description'=>'Designed for those who want to be different, the Flex 4 (14") has a number of features that set it apart. The palm rest is framed with a unique diamond cut bevel. It\'s also thinner and lighter than previous generations and has double the storage too, so you can say goodbye to external hard drives. Along with great battery life, the Flex 4 can be used in four different modes to suit your needs.',
                'price'=>'599',
                'image_path'=>'lenovo-laptop-flex-4-14-black-tent-mode-4.jpg'
            ],
            [
                'name'=>'ThinkVision E2323',
                'description'=>' The Lenovo ThinkVision E2323 monitor meets users all functional needs in both work and home environments.
It adopts WLED backlit panel, with wide screen of 1920 x 1080 resolution pixels, which provides Full HD qualification to customers. Its 16:9 aspect is standing for the increasingly popular trend. With built-in VGA + DVI interfaces and tiltable stand, it offers users comfortable usage experience. In addition, it is environmentally conscious, meeting the latest green standards including Energy Star 6.0 Certified, TCO 6.0, China Energy Standard Tier1, EPEAT Silver Certification23-inch FHD LED backlit LCD panel',
                'price'=>'171',
                'image_path'=>'E2323 - 60B0HAR1US.jpg'
            ],[
                'name'=>'Ideacentre AIO 910 (27")',
                'description'=>'The Lenovo Ideacentre AIO 910 is the ideal all-in-one for immersive entertainment. It combines a premium 27” display (Ultra HD Optional) with an optional 10-point multitouch screen. Its unique convertible dual hinge design is perfect for screen sharing and the built-in enhanced audio takes home entertainment to new levels. What’s more, with 3D Camera technology you can now interact more intuitively through hand gestures and even facial expressions.',
                'price'=>'1099',
                'image_path'=>'lenovo-desktop-ideacentre-aio-910-front-keyboard-mouse-2.jpg'
            ],
            [
                'name'=>'ThinkPad Noise Cancelling Earbuds',
                'description'=>'The ThinkPad Noise Cancelling Earbuds eliminate most ambient background noise through the use of active noise cancelling circuitry contained in a battery operated compartment. The ThinkPad Noise Cancelling Earbuds are specifically optimized for office environments auto, trains, and aircraft. In addition the ergonomically designed earbuds provide a secure fit that further isolates noise for a quality listening experience. ',
                'price'=>'99',
                'image_path'=>'_460_0_0B47313_V1.jpg'
            ],
            [
                'name'=>'Yoga Tab 3 Pro',
                'description'=>'The ultimate 10.1" video tablet with four different usage modes, an innovative integrated projector, dazzling multimedia, and epic battery life.',
                'price'=>'899',
                'image_path'=>'lenovo-yoga-tab-3-pro-feature-1.png'
            ],

        ]);

        
    }
}
