<?php
namespace AutomaterSDK\Request;

class AddNoteToTransactionRequest extends BaseRequest
{
    protected $note;

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }




}