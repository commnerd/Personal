import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SetJwtComponent } from './set-jwt.component';
import { ActivatedRoute, RouterModule } from '@angular/router';

describe('SetJwtComponent', () => {
  let component: SetJwtComponent;
  let fixture: ComponentFixture<SetJwtComponent>;

  beforeEach(() => {
    let activatedRoute: ActivatedRoute;
    TestBed.configureTestingModule({
      imports: [RouterModule],
      providers: [ActivatedRoute],
      declarations: [SetJwtComponent]
    });
    fixture = TestBed.createComponent(SetJwtComponent);
    activatedRoute = TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
