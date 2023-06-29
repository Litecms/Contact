<?php

namespace Litecms\Contact\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('litecms_contact_contacts')->insert([
            [
                'id'      => '1',
                'name'    => 'Renfos Technologies Pvt. Ltd.',
                'phone'   => '+91 484-4011 609',
                'mobile'  => '+91 98470 32299',
                'email'   => 'info@lavalite.org',
                'website' => 'https://lavalite.org',
                'details' => 'INFOPARK TBC
JNI Stadium Complex, Kaloor
Kochi, Kerala,
India, Pin - 682017',
                'address' => 'INFOPARK TBC, JNI Stadium Complex',
                'street'  => 'Kaloor',
                'city'    => 'Kochi',
                'state'   => 'Kerala',
                'country' => 'India',
                'zip'     => '682017',
                'lat'     => '9.998856897222739',
                'lng'     => '76.30494149737547',
                'status'  => 'Active',
                'slug'    => 'default',
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'litecms.contact.contact.view',
                'name'      => 'View Contact',
            ],
            [
                'slug'      => 'litecms.contact.contact.create',
                'name'      => 'Create Contact',
            ],
            [
                'slug'      => 'litecms.contact.contact.edit',
                'name'      => 'Update Contact',
            ],
            [
                'slug'      => 'litecms.contact.contact.delete',
                'name'      => 'Delete Contact',
            ],
            
            
                    ]);

        DB::table('menus')->insert([
        
            // Admin menu
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/contact/contact',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => 'las la-address-book',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            
            // User menu.
            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/contact/contact',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            // Public menu.
            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'contact',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Contact',
                'module'    => 'Contact',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'litecms.contact.contact.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
