<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(Request $request): View
    {
        $categories = [
            'All Categories',
            'IT',
            'Marketing',
            'Finance',
            'Healthcare',
        ];

        $jobTypes = [
            'Full-time',
            'Part-time',
            'Freelance',
        ];

        $locations = [
            'Anywhere',
            'Dhaka',
            'Chittagong',
            'Sylhet',
            'Khulna',
            'Rajshahi',
        ];

        // Static job listings (replace with database query later)
        $jobs = [
            ['title' => 'Web Developer', 'category' => 'IT', 'type' => 'Full-time', 'location' => 'Dhaka', 'salary' => '50000'],
            ['title' => 'Marketing Manager', 'category' => 'Marketing', 'type' => 'Part-time', 'location' => 'Chittagong', 'salary' => '30000'],
            ['title' => 'Accountant', 'category' => 'Finance', 'type' => 'Freelance', 'location' => 'Sylhet', 'salary' => '40000'],
        ];

        // Apply filters
        $filteredJobs = $jobs;
        if ($request->filled('category') && $request->category !== 'All Categories') {
            $filteredJobs = array_filter($filteredJobs, fn($job) => $job['category'] === $request->category);
        }
        if ($request->filled('type')) {
            $filteredJobs = array_filter($filteredJobs, fn($job) => $job['type'] === $request->type);
        }
        if ($request->filled('location') && $request->location !== 'Anywhere') {
            $filteredJobs = array_filter($filteredJobs, fn($job) => $job['location'] === $request->location);
        }

        return view('jobs.index', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'locations' => $locations,
            'jobs' => array_values($filteredJobs), // Reindex array after filtering
            'selectedCategory' => $request->category ?? 'All Categories',
            'selectedType' => $request->type ?? '',
            'selectedLocation' => $request->location ?? 'Anywhere',
        ]);
    }
}