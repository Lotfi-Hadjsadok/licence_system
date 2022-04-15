<?php
class LicenceKey
{
    public $wpdb;
    public $table;

    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'rvlicences';
        $charset_collate = $wpdb->get_charset_collate();

        // CREATE TABLE IF NOT EXISTS
        $this->wpdb->query("CREATE TABLE IF NOT EXISTS  " . $this->table . " (
            licence VARCHAR(255) PRIMARY KEY,
            website VARCHAR(255),
            status VARCHAR(255)
            )$charset_collate;");
    }

    function update(string $key, string $website = null, string $status = "inactive")
    {
        $licence = array(
            'licence' => $key,
            'website' => $website,
            'status' => $status
        );
        $this->wpdb->replace($this->table, $licence, array('%s', '%s', '%s'));
    }

    function find($licence)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE licence= %s ;";
        $stmt = $this->wpdb->prepare($query, $licence);
        return $this->wpdb->get_row($stmt);
    }

    function findAll()
    {
        $query = "SELECT * FROM " . $this->table . ";";
        return $this->wpdb->get_results($query);
    }

    function activate_licence($request)
    {
        $key = $request->get_param('key');
        $website = $request->get_param('website');
        $status = 'actif';
        $licence = $this->find($key);
        if (!$licence) {
            wp_send_json(array(
                'status' => 0,
                'response' => 'Invalid Licence !'
            ));
        }
        if (!$website) {
            wp_send_json(array(
                'status' => 0,
                'response' => 'Invalid Website !'
            ));
        }
        if ($licence->website) {
            wp_send_json(array(
                'status' => 0,
                'response' => "Licence Already in use !"
            ));
        }
        $this->update($key, $website, $status);
        wp_send_json(array(
            'status' => 1,
            'response' => "Licence Activated !"
        ));
    }
}
