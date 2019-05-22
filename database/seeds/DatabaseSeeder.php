<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	foreach (range(1, 10) as $index) {
    		// Generate users with role admin
    		App\Models\User::create([
		        'first_name' => $faker->firstName,
	            'last_name' => $faker->lastName,
	            'email' => $faker->email,
	            'role' => 'admin',
	            'password' => bcrypt('admin'),
	        ]);

	        // Generate categories
	        $category = App\Models\Category::create([
	            'name' => $faker->sentence(2)
	        ]);

	        // Generate 3 images for each category
	        App\Models\Image::create([
        		'path' => $faker->imageUrl(500), 
        		'model_id' => $category->id, 
        		'type' => 'category'
        	]);

	        // Generaate products
	        foreach (range(1, 10) as $indexx) {
	        	$product = App\Models\Product::create([
		            'category_id' => $category->id,
		            'name' => $faker->sentence(2), 
		            'slug' => $faker->slug, 
		            'description' => $faker->paragraph(10), 
	            	'price' => $faker->randomNumber(2), 
	            	'status' => rand(0, 1) ? 'New' : 'Promotion'
		        ]);

	        	// Generate 3 images for each product
		        for ($i=0; $i < 3; $i++) { 
		        	App\Models\Image::create([
		        		'path' => $faker->imageUrl(600), 
		        		'model_id' => $product->id, 
		        		'type' => 'product'
		        	]);
		        }
	        }

	        // Generate customers
	        $gender = mt_rand(0, 1) ? 'male' : 'female';

	        $user = App\Models\User::create([
		        'first_name' => $faker->firstName($gender),
	            'last_name' => $faker->lastName($gender),
	            'email' => $faker->email,
	            'role' => 'customer',
	            'password' => bcrypt('customer'),
	        ]);

	        $customer = App\Models\Customer::create([
		        'user_id' => $user->id, 
		        'tel' => $faker->phoneNumber, 
		        'gender' => $gender, 
		        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d')
	        ]);

	        foreach (range(0, 4) as $val) {
	        	App\Models\Address::create([
	        		'customer_id' => $customer->id, 
	        		'address' => $faker->address, 
	        		'lat' => $faker->latitude(), 
	        		'lng' => $faker->longitude()
	        	]);
	        }
		}
    }
}