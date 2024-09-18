import { Card, CardBody, CardTitle } from "@/Components/ui/Card";
import LoadingComponent from "@/Components/ui/Loading";
import DefaultLayout from "@/Layouts/DefaultLayout";
import React, { useEffect, useState } from "react";

const ProfilSekolah = (props) => {
    const sekolahID = props.sekolah_id;
    const [Data, setData] = useState([]);

    useEffect(() => {
        getDataSekolah();
    }, []);

    const getDataSekolah = async () => {
        const response = await axios.get(
            route("sekolah.getProfilSekolahByID", sekolahID)
        );
        const { data } = await response?.data;
        setData(data);
    };

    if (!Data) return <LoadingComponent />;

    return (
        <DefaultLayout>
            <Card className="bg-base-100 shadow-lg hover:shadow-2xl transition-shadow">
                <CardTitle className="text-center block mt-3">
                    Profile Sekolah
                </CardTitle>
                <CardBody>
                    <div className="grid lg:grid-cols-2">
                        <section>
                            <p>Nama Sekolah : {Data?.nama_sekolah} </p>
                            <p>NPSN Sekolah : {Data?.NPSN} </p>
                            <p>
                                Jenjang Sekolah : {Data?.jenjang?.nama_jenjang}{" "}
                            </p>
                            <p>
                                Alamat Sekolah :{" "}
                                {`${Data?.alamat}, Kec. ${Data?.kecamatan}`}{" "}
                            </p>
                        </section>
                        <section>
                            <p>No Telepon : {Data?.no_telepon} </p>
                            <p>Email Sekolah : {Data?.email} </p>
                            <p>Nama Kontak : {Data?.nama_kontak_person} </p>
                            <p>Jabatan Kontak : {Data?.jabatan} </p>
                        </section>
                    </div>
                </CardBody>
            </Card>

            <Card className="bg-base-100 shadow-lg hover:shadow-2xl transition-shadow mt-10">
                <CardTitle className="text-center block mt-3">
                    Data Kapita Sekolah
                </CardTitle>
                <div className="overflow-x-auto mt-3">
                    <table className="table">
                        {/* head */}
                        <thead>
                            <tr>
                                <th>Jumlah Guru</th>
                                <th>Jumlah Guru Pendidik Khusus</th>
                                <th>Jumlah Peserta Didik</th>
                                <th>Jumlah Penyandang Disabilitas</th>
                                <th>Jumlah Netra</th>
                                <th>Jumlah Rungu</th>
                                <th>Jumlah Wicara</th>
                                <th>Jumlah Daska</th>
                                <th>Jumlah Lumpuh Layu</th>
                                <th>Jumlah Paraplegi</th>
                                <th>Jumlah Celebral Palsy</th>
                                <th>Jumlah Kesulitan Belajar</th>
                                <th>Jumlah Autis</th>
                                <th>Jumlah Hiperaktif</th>
                                <th>Jumlah Rungu-Wicara</th>
                                <th>Jumlah Netra-Rungu</th>
                                <th>Jumlah Lainnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr className="text-center">
                                <th> {Data?.kapita?.jml_guru} </th>
                                <th>
                                    {" "}
                                    {
                                        Data?.kapita?.jml_guru_pendidikan_khusus
                                    }{" "}
                                </th>
                                <th> {Data?.kapita?.jml_peserta_didik} </th>
                                <th>
                                    {" "}
                                    {
                                        Data?.kapita
                                            ?.jml_peserta_didik_disabilitas
                                    }{" "}
                                </th>
                                <th> {Data?.kapita?.jml_netra} </th>
                                <th> {Data?.kapita?.jml_rungu} </th>
                                <th> {Data?.kapita?.jml_wicara} </th>
                                <th> {Data?.kapita?.jml_daska} </th>
                                <th> {Data?.kapita?.jml_lumpuh_layu} </th>
                                <th> {Data?.kapita?.jml_paraplegi} </th>
                                <th> {Data?.kapita?.jml_celebral_palsy} </th>
                                <th> {Data?.kapita?.jml_kesulitan_belajar} </th>
                                <th> {Data?.kapita?.jml_autis} </th>
                                <th> {Data?.kapita?.jml_hiperaktif} </th>
                                <th> {Data?.kapita?.jml_rungu_wicara} </th>
                                <th> {Data?.kapita?.jml_netra_rungu} </th>
                                <th> {Data?.kapita?.jml_lainnya} </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </DefaultLayout>
    );
};

export default ProfilSekolah;
