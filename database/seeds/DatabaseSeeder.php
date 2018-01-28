<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BlogPostTableSeeder::class);
        $this->call(EventPostTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(SkillCategoryTableSeeder::class);
        $this->call(EventBidTableSeeder::class);
        $this->call(ProfessionalCategoriesTableSeeder::class);
        $this->call(ProfessionalSelectedCategoriesTableSeeder::class);
        $this->call(ProfessionalBidEventsTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(PaymentTransactionsTableSeeder::class);
    }
}
