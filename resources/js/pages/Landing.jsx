import React from "react";
import { Link } from "@inertiajs/react";

export default function Landing() {
    return (
        <div className="flex flex-col items-center justify-center min-h-screen bg-gray-100">
            <h1 className="text-4xl font-bold mb-6">Welcome to the School Management System</h1>

            <div className="flex space-x-4">
                <Link href="/teachers" className="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Manage Teachers
                </Link>
                <Link href="/students" className="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    Manage Students
                </Link>
            </div>
        </div>
    );
}
