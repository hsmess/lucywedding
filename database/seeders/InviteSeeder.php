<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invitation;
use App\Models\Guest;

class InviteSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Path to CSV file
        $csvPath = database_path('seeders/GuestFormattedWithCode.csv');

        if (!file_exists($csvPath)) {
            $this->command->error('CSV file not found at: ' . $csvPath);
            return;
        }

        $file = fopen($csvPath, 'r');

        // Skip first two rows (table header and column headers)
        fgetcsv($file);
        fgetcsv($file);

        $totalGroups = 0;
        $totalGuests = 0;

        while (($row = fgetcsv($file)) !== false) {
            // Skip empty rows
            if (empty(array_filter($row))) {
                continue;
            }

            // Last column is the code (column index 5)
            $code = trim($row[5] ?? '');

            if (empty($code)) {
                $this->command->warn('Skipping row with no code: ' . implode(', ', $row));
                continue;
            }

            // Create invitation
            $invitation = Invitation::create([
                'code' => $code
            ]);

            // Create guests (columns 0-4 are guest names)
            $guestCount = 0;
            for ($i = 0; $i < 5; $i++) {
                $name = trim($row[$i] ?? '');

                if (!empty($name)) {
                    Guest::create([
                        'invitation_id' => $invitation->id,
                        'name' => $name,
                        'has_plus_one' => false,
                        'plus_one_id' => null,
                        'attending' => null,
                        'dietary_requirements' => null,
                        'song_request' => null,
                        'other_comments' => null,
                    ]);
                    $guestCount++;
                    $totalGuests++;
                }
            }

            $totalGroups++;
            $this->command->info("Created invitation {$code} with {$guestCount} guest(s)");
        }

        fclose($file);

        $this->command->info("Guest seeding completed! {$totalGroups} groups, {$totalGuests} total guests");
    }
}
