<?php

namespace internal\base;

use internal\base\dto\Data;
use internal\base\dto\DataInterface;
use internal\base\dto\Error;
use internal\base\dto\ErrorResponseDto;
use internal\base\dto\SuccessResponseDto;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public function behaviors()
    {
        $this->enableCsrfValidation = false;
        $behaviors = [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];

        return $behaviors;
    }

    public function rawResponse($data): Response
    {
        return $this->asJson($data);
    }

    public function successResponse(DataInterface|string|array $data): Response
    {
        $respDto = new SuccessResponseDto();
        if (is_string($data)) {
            $obj = new Data();
            $obj->message = $data;
            $respDto->data = $obj;
        } else {
            $respDto->data = $data;
        }

        return $this->asJson($respDto);
    }

    public function errorResponse($code, $message = "", $errorDetail = []): Response
    {
        $respDto = new ErrorResponseDto();
        if (!$message) {
            $message = Yii::$app->params['error.code'][$code] ?? "";
        }
        $respDto->error = new Error($code, $message, $errorDetail);

        return $this->asJson($respDto);
    }

}