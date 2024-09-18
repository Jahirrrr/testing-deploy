import React, { useEffect, useState } from "react";

const Pagination = ({ data, dataCurrentPage }) => {
    console.log(data);

    const [currentPage, setCurrentPage] = useState(1);

    useEffect(() => {
        dataCurrentPage(currentPage);
    }, [currentPage]);

    const prevAction = async (e) => {
        e.preventDefault();
        setCurrentPage(currentPage - 1);
    };

    const nextAction = async (e) => {
        e.preventDefault();
        setCurrentPage(currentPage + 1);
    };

    return (
        <div className="flex justify-center mt-10">
            <div className="join">
                {data.prev_page_url !== null && (
                    <button
                        className="join-item btn"
                        onClick={(e) => prevAction(e)}
                    >
                        «
                    </button>
                )}
                <button className="join-item btn">
                    Page {currentPage ?? data.current_page}
                </button>
                {data.next_page_url !== null && (
                    <button
                        className="join-item btn"
                        onClick={(e) => nextAction(e)}
                    >
                        »
                    </button>
                )}
            </div>
        </div>
    );
};

export default Pagination;
