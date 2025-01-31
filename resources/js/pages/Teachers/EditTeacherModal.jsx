import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";

export default function EditTeacherModal({ teacher, onClose, onTeacherUpdated }) {
    const [formData, setFormData] = useState({ ...teacher });
    const [loading, setLoading] = useState(false);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        setLoading(true);

        Inertia.put(`/teachers/${teacher.id}`, formData, {
            onSuccess: (page) => {
                alert("✅ Teacher updated successfully!");
                onTeacherUpdated(page.props.updatedTeacher);
                setLoading(false);
                onClose();
            },
            onError: (errors) => {
                console.error(errors);
                alert("❌ Failed to update teacher.");
                setLoading(false);
            },
        });
    };

    return (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div className="bg-white p-6 rounded shadow-lg w-96">
                <h2 className="text-xl font-bold mb-4">Edit Teacher</h2>
                <form onSubmit={handleSubmit} className="space-y-4">
                    <input
                        type="text"
                        name="fullname"
                        value={formData.fullname}
                        onChange={handleChange}
                        className="w-full px-3 py-2 border rounded"
                        required
                    />
                    <input
                        type="email"
                        name="email"
                        value={formData.email}
                        onChange={handleChange}
                        className="w-full px-3 py-2 border rounded"
                        required
                    />
                    <input
                        type="text"
                        name="phone"
                        value={formData.phone}
                        onChange={handleChange}
                        className="w-full px-3 py-2 border rounded"
                        required
                    />
                    <button type="submit" disabled={loading} className="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        {loading ? "Updating..." : "Update"}
                    </button>
                    <button type="button" onClick={onClose} className="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    );
}
