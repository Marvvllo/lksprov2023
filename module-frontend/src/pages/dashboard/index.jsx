import Link from "next/link";

const Dashboard = () => {
  return (
    <>
      <nav className="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <div className="container">
          <a className="navbar-brand" href="#">
            Job Seekers Platform
          </a>
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
          <div
            className="collapse navbar-collapse"
            id="navbarsExampleDefault"
          >
            <ul className="navbar-nav ml-auto">
              <li className="nav-item">
                <a className="nav-link" href="#">
                  Marsito Kusmawati
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link" href="#">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main>
        {/* S: Header */}
        <header className="jumbotron">
          <div className="container">
            <h1 className="display-4">Dashboard</h1>
          </div>
        </header>
        {/* E: Header */}
        <div className="container">
          {/* S: Data Validation Section */}
          <section className="validation-section mb-5">
            <div className="section-header mb-3">
              <h4 className="section-title text-muted">
                My Data Validation
              </h4>
            </div>
            <div className="row">
              {/* S: Link to Request Data Validation */}
              <div className="col-md-4">
                <div className="card card-default">
                  <div className="card-header">
                    <h5 className="mb-0">Data Validation</h5>
                  </div>
                  <div className="card-body">
                    <Link
                      href="/data_validation"
                      className="btn btn-primary btn-block"
                    >
                      + Request validation
                    </Link>
                  </div>
                </div>
              </div>
              {/* E: Link to Request Data Validation */}
              {/* S: Society Data Validation Box (Pending) */}
              <div className="col-md-4">
                <div className="card card-default">
                  <div className="card-header border-0">
                    <h5 className="mb-0">Data Validation</h5>
                  </div>
                  <div className="card-body p-0">
                    <table className="table table-striped mb-0">
                      <tbody>
                        <tr>
                          <th>Status</th>
                          <td>
                            <span className="badge badge-info">
                              Pending
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <th>Job Category</th>
                          <td className="text-muted">-</td>
                        </tr>
                        <tr>
                          <th>Job Position</th>
                          <td className="text-muted">
                            Web Developer
                          </td>
                        </tr>
                        <tr>
                          <th>Reason Accepted</th>
                          <td className="text-muted">-</td>
                        </tr>
                        <tr>
                          <th>Validator</th>
                          <td className="text-muted">-</td>
                        </tr>
                        <tr>
                          <th>Validator Notes</th>
                          <td className="text-muted">-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {/* E: Society Data Validation Box (Pending) */}
              {/* S: Society Data Validation Box (Accepted) */}
              <div className="col-md-4">
                <div className="card card-default">
                  <div className="card-header border-0">
                    <h5 className="mb-0">Data Validation</h5>
                  </div>
                  <div className="card-body p-0">
                    <table className="table table-striped mb-0">
                      <tbody>
                        <tr>
                          <th>Status</th>
                          <td>
                            <span className="badge badge-success">
                              Accepted
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <th>Job Category</th>
                          <td className="text-muted">
                            Computing and ICT
                          </td>
                        </tr>
                        <tr>
                          <th>Job Position</th>
                          <td className="text-muted">Programmer</td>
                        </tr>
                        <tr>
                          <th>Reason Accepted</th>
                          <td className="text-muted">
                            I can work hard
                          </td>
                        </tr>
                        <tr>
                          <th>Validator</th>
                          <td className="text-muted">Usman M.Ti</td>
                        </tr>
                        <tr>
                          <th>Validator Notes</th>
                          <td className="text-muted">siap kerja</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {/* E: Society Data Validation Box (Accepted) */}
            </div>
          </section>
          {/* E: Data Validation Section */}
          {/* S: List Job Seekers Section */}
          <section className="validation-section mb-5">
            <div className="section-header mb-3">
              <div className="row">
                <div className="col-md-8">
                  <h4 className="section-title text-muted">
                    My Job Applications
                  </h4>
                </div>
                <div className="col-md-4">
                  <Link
                    href="/job_vacancies"
                    className="btn btn-primary btn-lg btn-block"
                  >
                    + Add Job Applications
                  </Link>
                </div>
              </div>
            </div>
            <div className="section-body">
              <div className="row mb-4">
                {/* S: Job Applications info */}
                <div className="col-md-12">
                  <div className="alert alert-warning">
                    Your validation must be approved by validator to
                    applying job.
                  </div>
                </div>
                {/* E: Job Applications info */}
                {/* S: Job Applications Box (Registered) */}
                <div className="col-md-6">
                  <div className="card card-default">
                    <div className="card-header border-0">
                      <h5 className="mb-0">
                        PT. Maju Mundur Sejahtera
                      </h5>
                    </div>
                    <div className="card-body p-0">
                      <table className="table table-striped mb-0">
                        <tbody>
                          <tr>
                            <th>Address</th>
                            <td className="text-muted">
                              Jln. HOS. Cjokroaminoto (Pasirkaliki)
                              No. 900, DKI Jakarta
                            </td>
                          </tr>
                          <tr>
                            <th>Position</th>
                            <td className="text-muted">
                              <ul>
                                <li>
                                  Desain Grafis{" "}
                                  <span className="badge badge-info">
                                    Pending
                                  </span>
                                </li>
                                <li>
                                  Programmer{" "}
                                  <span className="badge badge-info">
                                    Pending
                                  </span>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <th>Apply Date</th>
                            <td className="text-muted">
                              September 12, 2023
                            </td>
                          </tr>
                          <tr>
                            <th>Notes</th>
                            <td className="text-muted">
                              I was the better one
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {/* S: Job Applications Box (Registered) */}
                {/* S: Job Applications Box (Registered) */}
                <div className="col-md-6">
                  <div className="card card-default">
                    <div className="card-header border-0">
                      <h5 className="mb-0">
                        PT. Maju Mundur Sejahtera
                      </h5>
                    </div>
                    <div className="card-body p-0">
                      <table className="table table-striped mb-0">
                        <tbody>
                          <tr>
                            <th>Address</th>
                            <td className="text-muted">
                              Jln. HOS. Cjokroaminoto (Pasirkaliki)
                              No. 900, DKI Jakarta
                            </td>
                          </tr>
                          <tr>
                            <th>Position</th>
                            <td className="text-muted">
                              <ul>
                                <li>
                                  Desain Grafis{" "}
                                  <span className="badge badge-success">
                                    Accepted{" "}
                                  </span>
                                </li>
                                <li>
                                  Programmer{" "}
                                  <span className="badge badge-danger">
                                    Rejected
                                  </span>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <th>Apply Date</th>
                            <td className="text-muted">
                              September 12, 2023
                            </td>
                          </tr>
                          <tr>
                            <th>Notes</th>
                            <td className="text-muted">-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {/* S: Job Applications Box (Registered) */}
              </div>
            </div>
          </section>
        </div>
        {/* E: List Job Seekers Section */}
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
  );
};

export default Dashboard;
