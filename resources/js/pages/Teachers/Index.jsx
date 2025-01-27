import React from "react";

export default function Index({ teachers }) {
    return (
        <div>
            <h1>Teachers List</h1>
            <ul>
                {teachers && teachers.length > 0 ? (
                    teachers.map((teacher) => (
                        <li key={teacher.id}>{teacher.fullname}</li>
                    ))
                ) : (
                    <li>No teachers available.</li>
                )}
            </ul>
        </div>
    );
}
