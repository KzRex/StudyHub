import React from "react";
import { Link } from "@inertiajs/react";

export default function TeacherList({ teachers }) {
    return (
        <div className="mt-6">
            <table className="w-full border-collapse border border-gray-300">
                <thead className="bg-gray-200">
                    <tr>
                        <th className="border border-gray-300 px-4 py-2">#</th>
                        <th className="border border-gray-300 px-4 py-2">Full Name</th>
                        <th className="border border-gray-300 px-4 py-2">Email</th>
                        <th className="border border-gray-300 px-4 py-2">Phone</th>
                        <th className="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {teachers.data.length > 0 ? (
                        teachers.data.map((teacher, index) => (
                            <tr key={teacher.id} className="text-center">
                                <td className="border border-gray-300 px-4 py-2">{index + 1}</td>
                                <td className="border border-gray-300 px-4 py-2">{teacher.fullname}</td>
                                <td className="border border-gray-300 px-4 py-2">{teacher.email}</td>
                                <td className="border border-gray-300 px-4 py-2">{teacher.phone}</td>
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
                            <td colSpan="5" className="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                No teachers available.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>

            {/* Pagination */}
            <div className="flex justify-center mt-4 space-x-2">
                {teachers.links.map((link, index) => (
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
