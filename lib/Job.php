<?php
    class Job{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Get All Jobs
        public function getAllJobs()
        {
            $this->db->query("SELECT jobs.*, categories.name AS cname
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            ORDER BY post_date DESC
            ");

            // Assign Result Set
            $results = $this->db->resultSet();

            return $results;
        }

        // Get Categories
        public function getCategories()
        {
            $this->db->query("SELECT * FROM categories");

            // Assign Result Set
            $results = $this->db->resultSet();

            return $results;
        }

        // Get Job By Category
        public function getByCategory($category)
        {
            $this->db->query("SELECT jobs.*, categories.name AS cname
            FROM jobs
            INNER JOIN categories
            ON jobs.category_id = categories.id
            WHERE jobs.category_id = $category
            ORDER BY post_date DESC
            ");

            // Assign Result Set
            $results = $this->db->resultSet();

            return $results;
        }

        // Get Category
        public function getCategory($category_id)
        {
            $this->db->query("SELECT * FROM categories WHERE id = :category_id");
            $this->db->bind(':category_id', $category_id);

            // Assign the row
            $row = $this->db->single();
            
            return $row;
        }

        // Get Job
        public function getJob($id)
        {
            $this->db->query("SELECT * FROM jobs WHERE id = :id");
            $this->db->bind(':id', $id);

            // Assign the row
            $row = $this->db->single();
            
            return $row;
        }

        // Create Job
        public function create($data)
        {
            // Insert Query
            $this->db->query("INSERT INTO jobs (category_id, job_title, company, descriptions, locations, 
            salary, contact_user, contact_email)
            VALUES (:category_id, :job_title, :company, :descriptions, :locations, :salary, :contact_user, :contact_email)");
            // Bind data
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title',  $data['job_title']);
            $this->db->bind(':company',  $data['company']);
            $this->db->bind(':descriptions',  $data['descriptions']);
            $this->db->bind(':locations',  $data['locations']);
            $this->db->bind(':salary',  $data['salary']);
            $this->db->bind(':contact_user',  $data['contact_user']);
            $this->db->bind(':contact_email',  $data['contact_email']);
            // Execute it
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Delete Job
        public function delete($id)
        {
            $this->db->query("DELETE FROM jobs WHERE id = $id");
            // Execute it
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }  
        }

        // Update Job
        public function update($id, $data)
        {
            // Insert Query
            $this->db->query("UPDATE jobs
                SET
                category_id = :category_id,
                job_title = :job_title,
                company = :company,
                descriptions = :descriptions,
                locations = :locations,
                salary = :salary,
                contact_user = :contact_user,
                contact_email = :contact_email
                WHERE id = $id");
            // Bind data
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title',  $data['job_title']);
            $this->db->bind(':company',  $data['company']);
            $this->db->bind(':descriptions',  $data['descriptions']);
            $this->db->bind(':locations',  $data['locations']);
            $this->db->bind(':salary',  $data['salary']);
            $this->db->bind(':contact_user',  $data['contact_user']);
            $this->db->bind(':contact_email',  $data['contact_email']);
            // Execute it
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>