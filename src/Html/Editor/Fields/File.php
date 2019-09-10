<?php

namespace Yajra\DataTables\Html\Editor\Fields;

/**
 * @see https://editor.datatables.net/reference/field/upload
 * @see https://editor.datatables.net/examples/advanced/upload.html
 * @see https://editor.datatables.net/examples/advanced/upload-many.html
 */
class File extends Field
{
    protected $type = 'upload';

    /**
     * Editor instance.
     *
     * @var string
     */
    protected $editor = 'editor';

    /**
     * @param string $name
     * @param string $label
     * @return \Yajra\DataTables\Html\Editor\Fields\Field|static
     */
    public static function make($name, $label = '')
    {
        return parent::make($name, $label)->displayFile()->clearText()->noImageText();
    }

    /**
     * Set editor instance for file upload.
     *
     * @param string $editor
     * @return $this
     */
    public function editor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Display image upon upload.
     *
     * @return $this
     */
    public function displayImage()
    {
        return $this->display("function (file_id) { return file_id ? '<img src=\"' + {$this->editor}.file('files', file_id).url + '\"/>' : null; }");
    }

    /**
     * @param string $label
     * @return $this
     */
    public function display($value)
    {
        $this->attributes['display'] = $value;

        return $this;
    }

    /**
     * Display the file path.
     *
     * @return $this
     */
    public function displayFile()
    {
        return $this->display("function (file_id) { return file_id; }");
    }

    /**
     * @param string $value
     * @return $this
     */
    public function clearText($value = 'Clear')
    {
        $this->attributes['clearText'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function noImageText($value = 'No image')
    {
        $this->attributes['noImageText'] = $value;

        return $this;
    }

    /**
     * @param bool $state
     * @return $this
     */
    public function multiple($state = true)
    {
        if ($state) {
            $this->type('uploadMany');
        }

        return $this;
    }
}
