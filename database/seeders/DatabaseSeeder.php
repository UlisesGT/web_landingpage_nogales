<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios de prueba
        $users = [
            [
                'name' => 'Isabella Rodriguez',
                'email' => 'isabella@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Ethan Martinez',
                'email' => 'ethan@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sophia Garcia',
                'email' => 'sophia@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@jaliscoflavors.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            
            // Crear pedidos completados para que puedan dejar reseñas
            $this->createOrdersForUser($user);
        }

        // Crear reseñas aprobadas
        $this->createReviews();
    }

    /**
     * Create orders for a user.
     */
    private function createOrdersForUser(User $user): void
    {
        $orders = [
            [
                'order_number' => Order::generateOrderNumber(),
                'user_id' => $user->id,
                'status' => 'completed',
                'order_type' => 'pickup',
                'subtotal' => 45.99,
                'tax_amount' => 4.14,
                'delivery_fee' => 0.00,
                'total_amount' => 50.13,
                'items' => [
                    [
                        'name' => 'Birria Tacos',
                        'quantity' => 3,
                        'price' => 12.99,
                        'total' => 38.97
                    ],
                    [
                        'name' => 'Horchata',
                        'quantity' => 1,
                        'price' => 3.99,
                        'total' => 3.99
                    ],
                    [
                        'name' => 'Consommé',
                        'quantity' => 1,
                        'price' => 3.99,
                        'total' => 3.99
                    ]
                ],
                'customer_info' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => '+1234567890',
                    'address' => '123 Main St, City, State 12345'
                ],
                'special_instructions' => 'Extra spicy please!',
                'completed_at' => now()->subWeeks(rand(1, 4)),
                'created_at' => now()->subWeeks(rand(1, 4)),
                'updated_at' => now()->subWeeks(rand(1, 4)),
            ]
        ];

        foreach ($orders as $orderData) {
            Order::create($orderData);
        }
    }

    /**
     * Create approved reviews.
     */
    private function createReviews(): void
    {
        $reviews = [
            [
                'user_id' => 1, // Isabella Rodriguez
                'rating' => 5,
                'comment' => 'The birria tacos were absolutely incredible! The meat was so tender and flavorful, and the consommé was the perfect complement. I can\'t wait to come back and try more dishes.',
                'is_approved' => true,
                'approved_at' => now()->subWeeks(2),
                'approved_by' => 4, // Admin user
                'created_at' => now()->subWeeks(2),
                'updated_at' => now()->subWeeks(2),
            ],
            [
                'user_id' => 2, // Ethan Martinez
                'rating' => 4,
                'comment' => 'I had the torta ahogada and it was a unique and delicious experience. The sauce had a great kick, and the sandwich was packed with flavor. I\'ll definitely be ordering it again.',
                'is_approved' => true,
                'approved_at' => now()->subMonth(),
                'approved_by' => 4, // Admin user
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subMonth(),
            ],
            [
                'user_id' => 3, // Sophia Garcia
                'rating' => 5,
                'comment' => 'Casa Jalisco is my new favorite spot for authentic Mexican food. The carne asada was cooked to perfection, and the service was excellent. Highly recommend!',
                'is_approved' => true,
                'approved_at' => now()->subMonths(2),
                'approved_by' => 4, // Admin user
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ]
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
