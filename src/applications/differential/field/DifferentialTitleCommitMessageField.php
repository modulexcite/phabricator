<?php

final class DifferentialTitleCommitMessageField
  extends DifferentialCommitMessageField {

  const FIELDKEY = 'title';

  public function getFieldName() {
    return pht('Title');
  }

  public static function getDefaultTitle() {
    return pht('<<Replace this line with your revision title>');
  }

  public function parseFieldValue($value) {
    if ($value === self::getDefaultTitle()) {
      $this->raiseParseException(
        pht(
          'Replace the default title line with a human-readable revision '.
          'title which describes the changes you are making.'));
    }

    return parent::parseFieldValue($value);
  }

  public function validateFieldValue($value) {
    if (!strlen($value)) {
      $this->raiseValidationException(
        pht(
          'You must provide a revision title in the first line '.
          'of your commit message.'));
    }
  }

}
