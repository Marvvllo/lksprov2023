
import { useTokenStore } from '@/stores/tokenStore';
import { postLogin } from '@/utils/query';
import { useMutation } from '@tanstack/react-query';
import Image from 'next/image'
import Link from 'next/link'
import { useRef, useState } from 'react'
import Router from 'next/router'

export default function Home() {
  return (
    <>
      <nav className="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <div className="container">
          <Link className="navbar-brand" href="#">
            Job Seekers Platform
          </Link>
          <button
            className="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon" />
          </button>
          <div className="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul className="navbar-nav ml-auto">
              <li className="nav-item">
                <Link className="nav-link" href="#">
                  Login
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main>
        {/* S: Header */}
        <header className="jumbotron">
          <div className="container text-center">
            <h1 className="display-4">Job Seekers Platform</h1>
          </div>
        </header>
        {/* E: Header */}
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-6">
              <div className="card card-default">
                <div className="card-header">
                  <h4 className="mb-0">Login</h4>
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <div className="col-4 text-right">ID Card Number</div>
                    <div className="col-8">
                      <input ref={cardNumberInput} type="text" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <div className="col-4 text-right">Password</div>
                    <div className="col-8">
                      <input ref={passwordInput} type="password" className="form-control" />
                    </div>
                  </div>
                  <div className="form-group row align-items-center mt-4">
                    <div className="col-4" />
                    <div className="col-8">
                      <Link href="/dashboard" className="btn btn-primary">Login</Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      {/* S: Footer */}
      <footer>
        <div className="container">
          <div className="text-center py-4 text-muted">
            Copyright © 2023 - Web Tech ID
          </div>
        </div>
      </footer>
      {/* E: Footer */}
    </>
  )
}
