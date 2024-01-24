<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Guest implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('login')) {
            $hak_akses = session('hak_akses');
            if ($hak_akses === '1') {
                return redirect()->to('admin/dashboard');
            } else if ($hak_akses === '2') {
                return redirect()->to('guru/dashboard');
            } else if ($hak_akses === '3') {
                return redirect()->to('siswa/dashboard');
            } else if ($hak_akses === '5') {
                return redirect()->to('guru-bk/dashboard');
            } else if ($hak_akses === '6') {
                return redirect()->to('wali-kelas/dashboard');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
