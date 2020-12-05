<?php

use Illuminate\Database\Seeder;

class LitecmsContactTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'id'      => '1',
                'name'    => 'Renfos Technologies Pvt. Ltd.',
                'phone'   => '+91 484-4011 609',
                'mobile'  => '+91 97444 89361',
                'email'   => 'india@lavalite.org',
                'website' => 'http://lavalite.org',
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
                'status'  => 'Show',
                'slug'    => 'headoffice',
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'contact.contact.view',
                'name' => 'View Contact',
            ],
            [
                'slug' => 'contact.contact.create',
                'name' => 'Create Contact',
            ],
            [
                'slug' => 'contact.contact.edit',
                'name' => 'Update Contact',
            ],
            [
                'slug' => 'contact.contact.delete',
                'name' => 'Delete Contact',
            ],
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/contact/contact',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => 'las fa-address-book',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            [
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'contact.htm',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            [
                'parent_id'   => 5,
                'key'         => null,
                'url'         => 'contact.htm',
                'name'        => 'Contact',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([]);
    }
}
