import { TestBed } from '@angular/core/testing';

import { AuthGuardService, loggedIn } from './auth-guard.service';
import { RouterTestingModule } from '@angular/router/testing';

describe('AuthGuardService', () => {
  let service: AuthGuardService;
  let mockWindow = { location: { href: '' }};

  beforeEach(() => {
    mockWindow = { location: { href: '' }};
    TestBed.configureTestingModule({
      imports: [RouterTestingModule],
      providers: [{provide: 'Window', useValue: mockWindow}]
    });
    service = TestBed.inject(AuthGuardService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should return false if not logged in', () => {
    expect(service.canActivate()).toEqual(false);
    expect(mockWindow.location.href).toEqual('/api/login')
  });

  it('should return true if logged in', () => {
    localStorage.setItem('jwt', 'jwt');
    expect(service.canActivate()).toEqual(true);
    expect(mockWindow.location.href).toEqual('')
    localStorage.removeItem('jwt');
  });
});
