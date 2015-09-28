<?php

namespace app\classes;

/**
 * Класс текстов диалоговых сообщений приложения.
 */
class Messages {

    //Удаоение записей
    const DELETE_SUCCESS = 'Запись успешно удалена.';
    const DELETE_ERROR_RELATION = 'Невозможно удалить запись, она связана с другими объектами!';
    //Откат операций
    const ROLLBACK_SUCCESS = 'Откат успешно выполнен.';
    const ROLLBACK_NOT_POSSIBLE = 'Откат операции не возможен!';

}
