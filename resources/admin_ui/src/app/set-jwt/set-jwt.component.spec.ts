import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SetJwtComponent } from './set-jwt.component';

describe('SetJwtComponent', () => {
  let component: SetJwtComponent;
  let fixture: ComponentFixture<SetJwtComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [SetJwtComponent]
    });
    fixture = TestBed.createComponent(SetJwtComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
