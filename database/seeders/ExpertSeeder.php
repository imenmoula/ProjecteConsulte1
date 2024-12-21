<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expert;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath1 = $this->uploadImage('images/expert1.png');
        $imagePath2 = $this->uploadImage('images/expert2.png');

        Expert::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'address' => '123 Technology St.',
            'phone' => '1234567890',
            'image' => $imagePath1,
            'domaine_id' => 1, // Assuming Technology domain
            'specialty' => 'Software Development',
            'availability' => true,
            'nb_experience' => 5,
        ]);

        Expert::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password123'),
            'address' => '456 Health Ave.',
            'phone' => '9876543210',
            'image' => $imagePath2,
            'domaine_id' => 2, // Assuming Health domain
            'specialty' => 'Medical Research',
            'availability' => true,
            'nb_experience' => 8,
        ]);
    }

    /**
     * Upload an image and return the path.
     */
    protected function uploadImage($imageName)
    {
        $imagePath = public_path('images/' . $imageName);

        if (file_exists($imagePath)) {
            return Storage::disk('public')->put('images', file_get_contents($imagePath));
        }

        return null;
    }
    }

