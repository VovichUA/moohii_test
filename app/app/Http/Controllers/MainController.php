<?php


namespace App\Http\Controllers;

use App\Answer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $answer = Answer::create($input);

        return $this->sendResponse($answer->toArray(), 'Answer saved');
    }

    /**
     * @param Uuid $user_id
     * @return JsonResponse
     */
    public function show(uuid $user_id): JsonResponse
    {
        $answer = Answer::where('user_id', $user_id);
        if (is_null($answer)) {
            return $this->sendError('answer not found.');
        }
        return $this->sendResponse($answer->toArray(), 'answer retrieved successfully.');
    }

    /**
     * @param Request $request
     * @param Answer $answer
     * @return JsonResponse
     */
    public function update(Request $request, Answer $answer): JsonResponse
    {
        $input = $request->all();

        $answer->answer = $input['answer'];
        $answer->save();
        return $this->sendResponse($answer->toArray(), 'answer updated successfully.');
    }

    /**
     * @param Answer $answer
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Answer $answer): JsonResponse
    {
        $answer->delete();
        return $this->sendResponse($answer->toArray(), 'answer deleted successfully.');
    }
}
