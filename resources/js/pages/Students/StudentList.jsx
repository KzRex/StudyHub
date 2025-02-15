import React from "react";
import { Link } from "@inertiajs/react";

export default function StudentList({ students }) {
    return (
        <div className="mt-6">
            <table className="w-full border-collapse border border-gray-300">
                <thead className="bg-gray-200">
                    <tr>
                        <th className="border border-gray-300 px-4 py-2">#</th>
                        <th className="border border-gray-300 px-4 py-2">Full Name</th>
                        <th className="border border-gray-300 px-4 py-2">Email</th>
                        <th className="border border-gray-300 px-4 py-2">Phone</th>
                        <th className="border border-gray-300 px-4 py-2">Address</th>
                        <th className="border border-gray-300 px-4 py-2">Date of Birth</th>
                        <th className="border border-gray-300 px-4 py-2">Class ID</th>
                        <th className="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {students.data.length > 0 ? (
                        students.data.map((student, index) => (
                            <tr key={student.id} className="text-center">
                                <td className="border border-gray-300 px-4 py-2">{index + 1}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.fullname}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.email}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.phone}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.address}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.date_of_birth}</td>
                                <td className="border border-gray-300 px-4 py-2">{student.class_id}</td>
                                <td className="border border-gray-300 px-4 py-2 space-x-2">
                                    <button className="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Update
                                    </button>
                                    <button className="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="8" className="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                No students available.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>

            {/* Pagination */}
            <div className="flex justify-center mt-4 space-x-2">
                {students.links.map((link, index) => (
                    <Link
                        key={index}
                        href={link.url || "#"}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                        className={`px-3 py-1 border rounded ${
                            link.active ? "bg-blue-500 text-white" : "bg-gray-200 text-black"
                        }`}
                    />
                ))}
            </div>
        </div>
    );
}
