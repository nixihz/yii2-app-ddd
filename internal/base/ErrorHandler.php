<?php

namespace internal\base;

use internal\base\dto\Error;
use internal\base\dto\ErrorResponseDto;
use Yii;
use yii\base\UserException;
use yii\db\Exception;
use yii\web\Response;

class ErrorHandler extends \yii\base\ErrorHandler
{

    /**
     * Renders the exception.
     *
     * @param \Exception|\Error $exception the exception to be rendered.
     */
    protected function renderException($exception)
    {
        if (Yii::$app->has('response')) {
            $response = Yii::$app->getResponse();
            $response->isSent = false;
            $response->stream = null;
            $response->data = null;
            $response->content = null;
        } else {
            $response = new Response();
        }
        $response->format = Response::FORMAT_JSON;

        $code = $exception->getCode();
        $errorDetail = [];
        if (YII_DEBUG) {
            $errorDetail['type'] = get_class($exception);
            if (!$exception instanceof UserException) {
                $errorDetail['file'] = $exception->getFile();
                $errorDetail['line'] = $exception->getLine();
                $errorDetail['stack-trace'] = explode("\n", $exception->getTraceAsString());
                if ($exception instanceof Exception) {
                    $errorDetail['error-info'] = $exception->errorInfo;
                }
            }
        }

        $message = $exception->getMessage();
        if (!$message) {
            $message = Yii::$app->params['error.code'][$code] ?? "";
        }
        $respDto = new ErrorResponseDto();
        $respDto->error = new Error($code, $message, [$errorDetail]);

        $response->data = $respDto;

        $response->send();
    }


}
