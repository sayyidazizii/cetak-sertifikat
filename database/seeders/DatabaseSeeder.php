<?php

namespace Database\Seeders;

use App\Models\core_customer;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\InvItemUnit;
use App\Models\SalesInvoice;
use App\Models\SalesInvoiceItem;
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
        // \App\Models\User::factory(10)->create();
        InvItemUnit::create([
            'item_unit_name' => 'Kg',
            'created_id' => 1,
        ]);
        InvItemType::create([
            'item_type_name' => '1 hari',
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);
        InvItemType::create([
            'item_type_name' => '2 hari',
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);
        InvItemType::create([
            'item_type_name' => '3 hari',
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);

        InvItemType::create([
            'item_type_name' => '4 - 5 hari',
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);

        InvItem::create([
            'item_name' => 'Setrika Baju',
            'item_type_id' => '1',
            'item_unit_price' => 3500,
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);
        InvItem::create([
            'item_name' => 'Setrika Baju',
            'item_type_id' => '2',
            'item_unit_price' => 3000,
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);
        InvItem::create([
            'item_name' => 'Setrika Baju',
            'item_type_id' => '3',
            'item_unit_price' => 2700,
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);
        InvItem::create([
            'item_name' => 'Setrika Baju',
            'item_type_id' => '4',
            'item_unit_price' => 2500,
            'item_unit_id' => '1',
            'created_id' => 1,
        ]);

        User::create([
            'name'=>'Aziz',
            'email'=>'sayyidsyafiq234@gmail.com',
            'level'=>'1',
            'password'=>bcrypt('@12345678')
        ]);
        User::create([
            'name'=>'Rahma',
            'email'=>'sayyidaulia@gmail.com',
            'level'=>'1',
            'password'=>bcrypt('@12345678')
        ]);


        core_customer::create([
            'customer_name'=>'Akil',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Hasna',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Sri Toko',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Leni',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Novi',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Nata',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Bima',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Poundra',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Zidan',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Hasan',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Tio',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Aprilia',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Tama',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Yuli',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Yesi',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Ines',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Aulia',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Bu Sum',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
        core_customer::create([
            'customer_name'=>'Nanda',
            'address'=>'sukosari,jumantono',
            'telp'=>'085602672382'
        ]);
    }
}
