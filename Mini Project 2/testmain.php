<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSearch - Find Your Dream Job</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 1.5rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #3498db;
        }

        .search-container {
            background-color: white;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1200px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .search-box {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .search-input {
            flex: 1;
            padding: 0.8raem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .search-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #2980b9;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .filter-select {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex: 1;
        }

        .job-listings {
            max-width: 1200px;
            margin: 2rem auto;
        }

        .job-card {
            background-color: white;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .job-card:hover {
            transform: translateY(-2px);
        }

        .job-title {
            color: #2c3e50;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .company-name {
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .job-details {
            display: flex;
            gap: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .apply-button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        .apply-button:hover {
            background-color: #219a52;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">JobSearch</div>
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Jobs</a>
                <a href="#">Companies</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
        </nav>
    </header>

    <div class="search-container">
        <form action="" method="GET">
            <div class="search-box">
                <input type="text" name="search" class="search-input" placeholder="Search for jobs, companies, or keywords">
                <button type="submit" class="search-button">Search</button>
            </div>
            <div class="filters">
                <select name="location" class="filter-select">
                    <option value="">All Locations</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="bandung">Bandung</option>
                </select>
                <select name="category" class="filter-select">
                    <option value="">All Categories</option>
                    <option value="it">IT & Software</option>
                    <option value="marketing">Marketing</option>
                    <option value="finance">Finance</option>
                </select>
                <select name="experience" class="filter-select">
                    <option value="">Experience Level</option>
                    <option value="entry">Entry Level</option>
                    <option value="mid">Mid Level</option>
                    <option value="senior">Senior Level</option>
                </select>
            </div>
        </form>
    </div>

    <div class="job-listings">
        <?php
        // Sample job data - In a real application, this would come from a database
        $jobs = [
            [
                'title' => 'Senior Web Developer',
                'company' => 'Tech Solutions Inc.',
                'location' => 'Jakarta',
                'type' => 'Full-time',
                'salary' => 'Rp 15-20 Juta'
            ],
            [
                'title' => 'Marketing Manager',
                'company' => 'Digital Marketing Agency',
                'location' => 'Surabaya',
                'type' => 'Full-time',
                'salary' => 'Rp 12-18 Juta'
            ],
            [
                'title' => 'UI/UX Designer',
                'company' => 'Creative Studio',
                'location' => 'Bandung',
                'type' => 'Contract',
                'salary' => 'Rp 10-15 Juta'
            ]
        ];

        foreach ($jobs as $job) {
            echo '<div class="job-card">';
            echo '<h3 class="job-title">' . htmlspecialchars($job['title']) . '</h3>';
            echo '<div class="company-name">' . htmlspecialchars($job['company']) . '</div>';
            echo '<div class="job-details">';
            echo '<span>📍 ' . htmlspecialchars($job['location']) . '</span>';
            echo '<span>⏰ ' . htmlspecialchars($job['type']) . '</span>';
            echo '<span>💰 ' . htmlspecialchars($job['salary']) . '</span>';
            echo '</div>';
            echo '<button class="apply-button">Apply Now</button>';
            echo '</div>';
        }
        ?>
    </div>

    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add search functionality
        const searchForm = document.querySelector('form');
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = this.querySelector('input[name="search"]').value;
            const location = this.querySelector('select[name="location"]').value;
            const category = this.querySelector('select[name="category"]').value;
            const experience = this.querySelector('select[name="experience"]').value;
            
            // Here you would typically make an AJAX call to your backend
            console.log('Searching for:', { searchTerm, location, category, experience });
            // For now, we'll just show an alert
            alert('Search functionality will be implemented with backend integration');
        });

        // Add apply button functionality
        document.querySelectorAll('.apply-button').forEach(button => {
        button.addEventListener('click', function() {
        const jobTitle = this.parentElement.querySelector('.job-title').textContent;
        alert("Application process for ${jobTitle} will be implemented with backend integration");
        });
    });
    </script>
</body>
</html>