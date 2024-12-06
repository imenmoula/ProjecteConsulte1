<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domaine;
use App\Models\Experts;
use app\Models\User;


class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $imagePath1 = $this->uploadImage('images/finance.png');
        $imagePath2 = $this->uploadImage('images/medical.jpg');
        $imagePath3 = $this->uploadImage('images/juridique.jpg');
        Domaine::create([
            'name' => 'Technology',
            'description' => 'All things related to technology.',
            'image' => $imagePath1, // Path to the image
        ]);

        Domaine::create([
            'name' => 'Health',
            'description' => 'Medical and healthcare services.',
            'image' => $imagePath2, // Path to the image
        ]);

        Domaine::create([
            'name' => 'Finance',
            'description' => 'Financial advisory and services.',
            'image' => $imagePath3, // Path to the image
        ]);
    }
     /**
     * Upload an image to the public disk and return the file path.
     *
     * @param string $imageName
     * @return string
     */
    protected function uploadImage($imageName)
    {
        // Ensure the image exists in the public/images directory (or wherever you store images)
        $imagePath = public_path('images/' . $imageName);
        
        // Check if the image exists in the local filesystem
        if (file_exists($imagePath)) {
            // Store the image in the public disk and return the path
            return Storage::disk('public')->put('images', file_get_contents($imagePath));
        }

        return null; // Return null if the image does not exist
    }
}
