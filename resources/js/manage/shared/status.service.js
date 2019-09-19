export default class StatusService {
  constructor() {

  }

  getStatusOptions() {
    return [
      {
        id: 0,
        name: 'SUSPENDED',
      },
      {
        id: 1,
        name: 'ACTIVE',
      },
      {
        id: 2,
        name: 'INACTIVE',
      },
    ];
  }


}
