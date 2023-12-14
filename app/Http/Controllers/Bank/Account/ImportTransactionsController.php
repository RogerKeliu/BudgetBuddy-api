<?php

namespace App\Http\Controllers\Bank\Account;

use App\Http\Controllers\Controller;
use Domain\Shared\Infrastructure\Bus\Command\CommandBus;
use Illuminate\Http\Request;

class ImportTransactionsController extends Controller
{
    protected $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {

        // Replace 'YOUR_SLACK_TOKEN' with your actual Slack token
        $slackToken = getenv('SLACK_BOT_USER_OAUTH_TOKEN');

        // Slack API endpoint URL
        $apiUrl = 'https://slack.com/api/chat.postMessage'; // Replace with the specific API endpoint you want to use

        // Set up the request headers
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $slackToken,
        ];

        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check the response
        if (isset($data['ok']) && $data['ok'] === true) {
            // Request was successful
            print_r($data);
        } else {
            // Request failed
            echo 'Error: ' . $data['error'];
        }
        // $this->commandBus->dispatch(AccountDeleteCommand::create($request->get('ids')));

        return 200;
    }
}
