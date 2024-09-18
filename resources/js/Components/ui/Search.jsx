import { Link } from "@inertiajs/react";
import axios from "axios";
import React, { useState, useRef, useEffect } from "react";
import { FaSearch, FaMicrophone } from "react-icons/fa";

const SearchComponent = () => {
    const [query, setQuery] = useState("");
    // const [selectedIndex, setSelectedIndex] = useState(-1);
    const [DataSearch, setDataSearch] = useState();
    const listRef = useRef(null);

    console.log(DataSearch);

    useEffect(() => {
        if (query) {
            getQuerySearch();
        }
    }, [query]);

    const getQuerySearch = async () => {
        try {
            const response = await axios.get(route("search.searchByPage"), {
                params: { query },
            });
            const { data } = response;
            setDataSearch(data);
        } catch (error) {
            console.log("Fetch Error : ", error);
        }
    };

    // const handleKeyDown = (e) => {
    //     if (e.key === "ArrowDown") {
    //         e.preventDefault();
    //         setSelectedIndex((prevIndex) =>
    //             Math.min(DataSearch.length - 1, prevIndex + 1)
    //         );
    //     } else if (e.key === "ArrowUp") {
    //         e.preventDefault();
    //         setSelectedIndex((prevIndex) =>
    //             Math.max(0, prevIndex - 1)
    //         );
    //     } else if (e.key === "Enter") {
    //         e.preventDefault();
    //         if (selectedIndex >= 0 && selectedIndex < DataSearch.length) {
    //             handleItemClick(DataSearch[selectedIndex]);
    //         }
    //     }
    // };

    return (
        <div
            className={`w-full relative bg-white shadow-md ${
                query ? "rounded-t-md" : "rounded-md"
            }`}
        >
            <div className="relative">
                <div
                    className={`flex items-center border border-blue-300 rounded-md overflow-hidden`}
                >
                    {/* Input */}
                    <input
                        type="text"
                        placeholder="Search…"
                        value={query}
                        onChange={(e) => setQuery(e.target.value)}
                        className={`border-none w-full h-12 pr-16 shadow-sm text-black rounded-md transition-all ease-in-out duration-300`}
                    />
                    {/* Tombol Mikrofon */}
                    {/* <button
                        type="button"
                        className="absolute right-12 top-0 h-full px-4 text-gray-500 hover:text-gray-700 transition-all ease-in-out duration-300"
                    >
                        <FaMicrophone size={20} />
                    </button> */}

                    {/* Tombol Search */}
                    <button
                        type="submit"
                        className="absolute right-0 top-0 h-full px-4 flex items-center justify-center bg-teal-500 text-white rounded-r-md hover:bg-teal-600 focus:outline-none transition-all ease-in-out duration-300"
                    >
                        <FaSearch size={20} />
                    </button>
                </div>

                {/* Menampilkan hasil filter */}
                {query && (
                    <ul
                        ref={listRef}
                        className="menu menu-compact p-2 max-h-56 overflow-y-auto bg-white shadow-md rounded-b-md absolute w-full z-10 border-gray-300 transition-all ease-in-out duration-300"
                    >
                        {DataSearch?.length > 0 ? (
                            DataSearch?.map((packageItem, index) => (
                                <li
                                    key={index}
                                    className={`hover:bg-gray-100 rounded text-black transition-all duration-200 ease-in-out`}
                                >
                                    {packageItem.nama_sekolah ? (
                                        <Link
                                            className="p-2 block cursor-pointer"
                                            href={route("profil-sekolah", {
                                                slug: packageItem.slug,
                                            })}
                                        >
                                            {packageItem.nama_sekolah}
                                        </Link>
                                    ) : (
                                        <Link
                                            className="p-2 block cursor-pointer"
                                            href={route("post-detail", {
                                                id: packageItem.id,
                                            })}
                                        >
                                            {packageItem.judul}
                                        </Link>
                                    )}
                                </li>
                            ))
                        ) : (
                            <li className="p-2 text-gray-500">
                                No results found
                            </li>
                        )}
                    </ul>
                )}
            </div>
        </div>
    );
};

export default SearchComponent;
