import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { useEffect, useState } from "react";

export default function Emails({ emails }) {
    const [emailsList, setEmailsList] = useState(emails);
    useEffect(() => {
        setTimeout(() => {
            axios('/emails/fetch').then(response => {
                window.location.reload();
            })
        }, 5000)
    }, []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    { }
                </h2>
            }
        >
            <Head title="Emails" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        {emailsList.data.map((email, index) => (
                            <div key={index}
                                className="p-6 bg-white border-b border-gray-200 hover:bg-gray-50 cursor-pointer">
                                <Link href={`/emails/${email.id}`}>
                                    <div className="px-4">
                                        <div className="text-gray-400 leading-7">
                                            From: {email.from}
                                        </div>
                                        <div className="text-gray-400 leading-7">
                                            To: {email.to}
                                        </div>
                                        <div className="text-lg text-gray-900 leading-7 font-semibold">
                                            {email.name}
                                        </div>
                                        <div className="text-gray-600 leading-7 font-semibold">
                                            {email.subject}
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        ))}
                    </div>
                    <div className="flex justify-center mt-5">
                        {emailsList.links.length > 5 ? (
                            <>
                                {emailsList.links.map((link, index) => {
                                    if (index === 0 || index === emailsList.links.length - 1 || (index >= emailsList.current_page - 2 && index <= emailsList.current_page + 2)) {
                                        return (
                                            <div key={index} className="bg-white p-1 text-gray-700">
                                                <Link
                                                    href={link.url}
                                                    className={`text-gray-600 hover:text-gray-900 px-4 py-2 ${link.active ? 'text-gray-900' : ''
                                                        }`}
                                                    dangerouslySetInnerHTML={{ __html: link.label }}
                                                >
                                                </Link>
                                            </div>
                                        );
                                    } else if (index === emailsList.current_page - 3 || index === emailsList.current_page + 3) {
                                        return (
                                            <div key={index} className="bg-white p-1 text-gray-700">
                                                <span className="px-4 py-2">...</span>
                                            </div>
                                        );
                                    }
                                    return null;
                                })}
                            </>
                        ) : (
                            emailsList.links.map((link, index) => (
                                <div key={index} className="bg-white p-1 text-gray-700">
                                    <Link
                                        href={link.url}
                                        className={`text-gray-600 hover:text-gray-900 px-4 py-2 ${link.active ? 'text-gray-900' : ''
                                            }`}
                                        dangerouslySetInnerHTML={{ __html: link.label }}
                                    >
                                    </Link>
                                </div>
                            ))
                        )}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
