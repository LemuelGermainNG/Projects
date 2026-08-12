<?php

declare(strict_types=1);

namespace App\Console\Commands\Firebase;

use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Firestore;

final class SeedFirebaseUsersCommand extends Command
{
    protected $signature = 'firebase:seed-users
        {--count=100 : Number of users to create}
        {--collection=users : Firestore collection}
        {--clear : Delete existing documents before seeding}';

    protected $description = 'Seed fake users into Firebase Firestore';

    public function handle(
        Firestore $firestore,
    ): int {
        $count = max(
            1,
            (int) $this->option('count'),
        );

        $collectionName = (string) $this->option(
            'collection',
        );

        $collection = $firestore
            ->database()
            ->collection($collectionName);

        if ($this->option('clear')) {
            $this->clear($collection);
        }

        $faker = Factory::create();

        $progress = $this->output->createProgressBar(
            $count,
        );

        $progress->start();

        for ($index = 1; $index <= $count; $index++) {
            $id = Str::random(6);

            $collection
                ->document($id)
                ->set([
                    'id' => $id,
                    'name' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'status' => $faker->randomElement([
                        'active',
                        'inactive',
                    ]),
                ]);

            $progress->advance();
        }

        $progress->finish();

        $this->newLine(2);

        $this->info(
            sprintf(
                '%d users created in [%s].',
                $count,
                $collectionName,
            ),
        );

        return self::SUCCESS;
    }

    private function clear(
        object $collection,
    ): void {
        $deleted = 0;

        foreach ($collection->documents() as $document) {
            if (! $document->exists()) {
                continue;
            }

            $document->reference()->delete();

            $deleted++;
        }

        $this->info(
            sprintf(
                '%d existing users deleted.',
                $deleted,
            ),
        );
    }
}
