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
        $this->call(AmphurTableSeeder::class);
        $this->call(BankMasterTableSeeder::class);
        $this->call(CarouselTableSeeder::class);
        $this->call(ContactUsMasterTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(GennerateKeyTableSeeder::class);
        $this->call(HomeCarouselMainMasterTableSeeder::class);
        $this->call(LevelMasterTableSeeder::class);
        $this->call(MenuMasterTableSeeder::class);
        $this->call(PostCodesTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BrandProductMasterTableSeeder::class);
        $this->call(DeliveryTableSeeder::class);
        $this->call(VideoSettingTableSeeder::class);
        $this->call(CategoryMasterTableSeeder::class);
        $this->call(ProductMasterTableSeeder::class);
    }
}
